import os 
from hillclimber import HILL_CLIMBER


hillclimber = HILL_CLIMBER()
hillclimber.Evolve() 
hillclimber.Show_Best() 


# 
# for i in range(5):
#    os.system("python3 generate.py")
#    os.system("python3 simulate.py")