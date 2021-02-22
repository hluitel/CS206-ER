import numpy
import matplotlib.pyplot as plt
 
backLegSensorValues = numpy.load('temp_data.npy')
frontLegSensorValues = numpy.load('frontLegSensorValues.npy')
plt.title("FrontLeg vs Back Leg")
plt.plot(backLegSensorValues,label = 'Back Leg Values',linewidth = 3)
plt.plot(frontLegSensorValues,label = 'Front Leg Values')
plt.legend()
plt.show()   
print(backLegSensorValues)
