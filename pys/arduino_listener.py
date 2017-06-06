import serial
from gphoto import capture
ser = serial.Serial("/dev/ttyUSB0", 9600) # Establish the connection on a specific port

while True:
    arduino = len(ser.readline())
    if arduino > 0:
		capture()
    print ser.readline()
