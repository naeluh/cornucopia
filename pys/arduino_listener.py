#https://stackoverflow.com/questions/4977125/passing-value-from-php-script-to-python-script
import serial
import sys
folder = sys.argv[1]
from gphoto import capture
ser = serial.Serial("/dev/ttyUSB0", 9600) # Establish the connection on a specific port

while True:
    arduino = len(ser.readline())
    if arduino > 0:
		capture(folder)
    print ser.readline()
