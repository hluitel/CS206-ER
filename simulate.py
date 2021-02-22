import pybullet as p
import pybullet_data
import pyrosim.pyrosim as pyrosim
import time
import numpy

physicsClient = p.connect(p.GUI)
p.setAdditionalSearchPath(pybullet_data.getDataPath())
p.disconnect

p.setGravity(0,0,-9.8)
p.loadURDF("plane.urdf")
p.loadURDF("body.urdf")
p.loadSDF("world.sdf")

pyrosim.Prepare_To_Simulate("body.urdf")
backLegSensorValues = numpy.zeros(10000)
for i in range(1000):
  p.stepSimulation()
  #backLegTouch = pyrosim.Get_Touch_Sensor_Value_For_Link("BackLeg")
  backLegSensorValues[i] = pyrosim.Get_Touch_Sensor_Value_For_Link("BackLeg")
  time.sleep(1/60)

print(backLegSensorValues)
numpy.save('temp_data',backLegSensorValues)





