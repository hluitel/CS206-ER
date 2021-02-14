import pyrosim.pyrosim as pyrosim

pyrosim.Start_SDF("boxes.sdf")
length = 1
width = 1
height = 1

x = 0
y = 0
z = 0.5
for k in range(3):
   y  = k
   length = 1
   width = 1
   height = 1
   for j in range(5):
      x  = j
      length = 1
      width = 1
      height = 1
      for i in range(10): 
         pyrosim.Send_Cube(name="Box", pos=[x,y,z+i] , size=[length,width,height])
         length = length -.10
         width = width - .10
         height = height - .10


pyrosim.End()


