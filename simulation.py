import pybullet as p
import pybullet_data
import pyrosim.pyrosim as pyrosim
import time
import numpy
import random
import constants as c
from  world import WORLD
from robot import ROBOT


class SIMULATION:

   def __init__(self):
      #simulation = SIMULATION()
      self.physicsClient = p.connect(p.GUI)
      p.setAdditionalSearchPath(pybullet_data.getDataPath())
      p.setGravity(0,0,c.GRAVITY)
      self.world = WORLD()
      self.robot = ROBOT()


   def Run(self):
     for i in range(1000):
       p.stepSimulation()
       self.robot.Sense(i)

       self.robot.Think()

       self.robot.Act(i)
    
       time.sleep(1/60)
   def Get_Fitness(self):
      self.robot.Get_Fitness()

   def __del__(self):
     p.disconnect()
        
