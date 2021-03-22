import pyrosim.pyrosim as pyrosim
import random 
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

def Create_Robot():
   length = 1
   width = 1
   height = 1

   x = 0
   y = 0
   z = 0.5

   



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

   sensors_neurons = {1,2,3}
   motor_neurons = {3,4}
   for i in sensors_neurons:
      for k in motor_neurons:
         pyrosim.Send_Synapse(sourceNeuronName = i , targetNeuronName = k , weight = random.uniform(-1,1))

          
   pyrosim.End()




Create_World()
Create_Robot()
Generate_Body()
Generate_Brain()


