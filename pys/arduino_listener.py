#https://stackoverflow.com/questions/4977125/passing-value-from-php-script-to-python-script
from __future__ import print_function
import logging
import os
import subprocess
import sys
import gphoto2 as gp
from datetime import datetime
#from capture_image import main
#from Tkinter import *
#from random import *
import serial

def store(*values):
    store.values = values or store.values
    return store.values
store.values = ()

def capture(directory):
    t = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    logging.basicConfig(
    format='%(levelname)s: %(name)s: %(message)s', level=logging.WARNING)
    gp.check_result(gp.use_python_logging())
    context = gp.gp_context_new()
    camera = gp.check_result(gp.gp_camera_new())
    gp.check_result(gp.gp_camera_init(camera, context))
    print('Capturing image')
    file_path = gp.check_result(gp.gp_camera_capture(
        camera, gp.GP_CAPTURE_IMAGE, context))
    print('Camera file path: {0}/{1}'.format(file_path.folder, file_path.name))
    target = os.path.join(directory, t+file_path.name)
    print(target)
    print('Copying image to', target)
    camera_file = gp.check_result(gp.gp_camera_file_get(
            camera, file_path.folder, file_path.name,
            gp.GP_FILE_TYPE_NORMAL, context))
    gp.check_result(gp.gp_file_save(camera_file, target))
    #subprocess.call(['xdg-open', target])
    gp.check_result(gp.gp_camera_exit(camera, context))
    return 0


#folder = sys.argv[1]
#print sys.argv[1]
directory = sys.argv[1]
if not os.path.exists(directory):
    os.makedirs(directory)
ser = serial.Serial("/dev/ttyUSB0", 9600) 

while True:
    arduino = len(ser.readline())
    if arduino > 0:
		capture(directory)
    #print ser.readline()
