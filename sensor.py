import pybullet as p
import pybullet_data
import pyrosim.pyrosim as pyrosim
import time
import numpy
import random
import constants as c

class SENSOR:
  def __init__(self,linkName):
    self.linkName = linkName
    self.values = numpy.zeros(10000)
    #print(self.values) 
    
  def Get_Value(self,t):
    self.values[t] = pyrosim.Get_Touch_Sensor_Value_For_Link(self.linkName)

    if t == 1000:
      #print(self.values)
      pass
  

  def Save_Values(self):
    np.sace('data/sensorValues.npy', self.values)

