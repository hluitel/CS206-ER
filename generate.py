import pyrosim.pyrosim as pyrosim

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

   pyrosim.Start_URDF("body.urdf")
   pyrosim.Send_Cube(name="Torso", pos=[1,0,1.5] , size=[length,width,height])
   pyrosim.Send_Joint( name = "Torso_FLeg" , parent= "Torso" , child = "FrontLeg" , type = "revolute", position = "1.5 0 1.0")
   pyrosim.Send_Cube(name="FrontLeg", pos=[0.5,0,-0.5] , size=[length,width,height])
   pyrosim.Send_Joint( name = "Torso_BLeg" , parent= "Torso" , child = "BackLeg" , type = "revolute", position = "0.5 0 1.0")
   pyrosim.Send_Cube(name="BackLeg", pos=[-0.5,0,-0.5] , size=[length,width,height])
   pyrosim.End()      


Create_World()
Create_Robot()

