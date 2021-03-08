import pybullet as p
import pybullet_data
import pyrosim.pyrosim as pyrosim
import time
import numpy
import random
import constants as c 

physicsClient = p.connect(p.GUI)
p.setAdditionalSearchPath(pybullet_data.getDataPath())
p.disconnect

p.setGravity(0,0,c.GRAVITY)
p.loadURDF("plane.urdf")
robot = p.loadURDF("body.urdf")
p.loadSDF("world.sdf")
x = numpy.pi
Vec_val = numpy.linspace(-x, x, c.VECTOR_SIZE)

#backleg information 
bAmplitude = x/4
bFrequency = 10
bPhaseOffset = 0
bTargetAngle = numpy.zeros(c.VECTOR_SIZE)

#frontLeg Information 
fAmplitude = x/5
fFrequency = 10
fPhaseOffset = 0
fTargetAngle = numpy.zeros(c.VECTOR_SIZE)


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

  maxForce = c.MAXFORCE)

  pyrosim.Set_Motor_For_Joint(
  bodyIndex = robot,
  jointName = "Torso_FLeg",
  controlMode = p.POSITION_CONTROL,
  targetPosition = fTargetAngle[i],
  maxForce = c.MAXFORCE)
  time.sleep(1/60)

print(backLegSensorValues)
#saving Senors information
numpy.save('temp_data',backLegSensorValues)
numpy.save('frontLegSensorValues',frontLegSensorValues)

#saving Motors informatiom
numpy.save('data/bTargetAngle.npy', bTargetAngle)
numpy.save('data/fTargetAngle.npy', fTargetAngle)


