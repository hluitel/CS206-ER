import pybullet as p
import pybullet_data
import pyrosim.pyrosim as pyrosim
import time
import numpy
import random

physicsClient = p.connect(p.GUI)
p.setAdditionalSearchPath(pybullet_data.getDataPath())
p.disconnect

p.setGravity(0,0,-9.8)
p.loadURDF("plane.urdf")
robot = p.loadURDF("body.urdf")
p.loadSDF("world.sdf")
x = numpy.pi
pyrosim.Prepare_To_Simulate("body.urdf")
backLegSensorValues = numpy.zeros(10000)
frontLegSensorValues = numpy.zeros(10000)
for i in range(1000):
  p.stepSimulation()
  #backLegTouch = pyrosim.Get_Touch_Sensor_Value_For_Link("BackLeg")
  backLegSensorValues[i] = pyrosim.Get_Touch_Sensor_Value_For_Link("BackLeg")
  frontLegSensorValues[i] = pyrosim.Get_Touch_Sensor_Value_For_Link("FrontLeg")
  pyrosim.Set_Motor_For_Joint(
  bodyIndex = robot,
  jointName = "Torso_BLeg",
  controlMode = p.POSITION_CONTROL,
  targetPosition = -x/4.0,

  maxForce = 500)

  pyrosim.Set_Motor_For_Joint(
  bodyIndex = robot,
  jointName = "Torso_FLeg",
  controlMode = p.POSITION_CONTROL,
  targetPosition = x/4.0,
  maxForce = 500)
  time.sleep(1/60)

print(backLegSensorValues)
numpy.save('temp_data',backLegSensorValues)
numpy.save('frontLegSensorValues',frontLegSensorValues)





