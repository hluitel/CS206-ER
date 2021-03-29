import numpy as np 
import os


class SOLUTION:
    
   def __init__(self):
      self.weights = np.random.rand(3,2)
      self.weights = (self.weights * 2) - 1
      #print(self.weight) 
   def Evaluate(self):
   
      os.system("python3 simulate.py") 
      
                  
   def Create_World():
	   
      pyrosim.Start_SDF("world.sdf")
      length = 1
      width = 1
      height = 1
   
      x = 6
      y = 6
      z = 0.5
    
      pyrosim.Send_Cube(name="Box", pos=[x,y,z] , size=[length,width,height])
            
      pyrosim.End()


   



   def Generate_Body():
      length = 1
      width = 1
      height = 1
   
      x = 0
      y = 0
      z = 0.5
   
      pyrosim.Start_URDF("body.urdf")
      pyrosim.Send_Cube(name="Torso", pos=[1, 0, 1.5], size=[length, width, height])
      pyrosim.Send_Joint(name="Torso_FLeg", parent="Torso", child="FrontLeg", type="revolute", position="1.5 0 1.0")
      pyrosim.Send_Cube(name="FrontLeg", pos=[0.5, 0, -0.5], size=[length, width, height])
      pyrosim.Send_Joint(name="Torso_BLeg", parent="Torso", child="BackLeg", type="revolute", position="0.5 0 1.0")
      pyrosim.Send_Cube(name="BackLeg", pos=[-0.5, 0, -0.5], size=[length, width, height])
      pyrosim.End()
   
   



   def Generate_Brain():
      pyrosim.Start_NeuralNetwork("brain.nndf")
      pyrosim.Send_Sensor_Neuron(name = 0 , linkName = "Torso")
      pyrosim.Send_Sensor_Neuron(name = 1 , linkName = "BackLeg")
      pyrosim.Send_Sensor_Neuron(name = 2 , linkName = "FrontLeg")
      
      
      pyrosim.Send_Motor_Neuron( name = 3 , jointName = "Torso_BLeg")
      pyrosim.Send_Motor_Neuron( name = 4 , jointName = "Torso_FLeg")
   
   # 
   #    pyrosim.Send_Synapse(sourceNeuronName = 0 , targetNeuronName = 3 , weight = -1.0)
   #    pyrosim.Send_Synapse(sourceNeuronName = 1 , targetNeuronName = 3 , weight = -1.0 )
   #    pyrosim.Send_Synapse(sourceNeuronName = 0 , targetNeuronName = 4 , weight = -1.0 )
   #    pyrosim.Send_Synapse(sourceNeuronName = 2 , targetNeuronName = 4 , weight = -1.0 )
   
      sensors_neurons = {0,1,2}
      motor_neurons = {0,1}
      for currentRow in sensors_neurons:
         for currentColumn in motor_neurons:
            pyrosim.Send_Synapse(sourceNeuronName = currentRow , targetNeuronName = currentColumn+3, weight = self.weights[currentRow][currentColumn])
   
             
      pyrosim.End()


