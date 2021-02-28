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
Vec_val = numpy.linspace(-x/4, x/4, 1000)

#backleg information 
bAmplitude = x/4
bFrequency = 10
bPhaseOffset = 0
bTargetAngle = numpy.zeros(1000)

#frontLeg Information 
fAmplitude = x/4
fFrequency = 10 
fPhaseOffset = 0
fTargetAngle = numpy.zeros(1000)


for k in range(1000):
  bTargetAngle[k] = bAmplitude * numpy.sin(bFrequency * Vec_val[k] +bPhaseOffset)
  fTargetAngle[k] = fAmplitude * numpy.sin(fFrequency * Vec_val[k] +fPhaseOffset)





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
  targetPosition = bTargetAngle[i],

  maxForce = 30)

  pyrosim.Set_Motor_For_Joint(
  bodyIndex = robot,
  jointName = "Torso_FLeg",
  controlMode = p.POSITION_CONTROL,
  targetPosition = fTargetAngle[i],
  maxForce = 30)
  time.sleep(1/60)

print(backLegSensorValues)
#saving Senors information
numpy.save('temp_data',backLegSensorValues)
numpy.save('frontLegSensorValues',frontLegSensorValues)

#saving Motors informatiom
np.save('data/bTargetAngle.npy', bTargetAngle)
np.save('data/fTargetAngle.npy', fTargetAngle)


