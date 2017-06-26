#https://stackoverflow.com/questions/4977125/passing-value-from-php-script-to-python-script
from __future__ import print_function
from time import sleep
import logging
import os
import subprocess
import sys
import gphoto2 as gp
from datetime import datetime
import pwd
import grp
#from capture_image import main
#from Tkinter import *
#from random import *
import serial

def store(*values):
    store.values = values or store.values
    return store.values
store.values = ()

def capture(d):
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
    target = os.path.join(d, t+file_path.name)
    print(target)
    print('Copying image to', target)
    camera_file = gp.check_result(gp.gp_camera_file_get(
            camera, file_path.folder, file_path.name,
            gp.GP_FILE_TYPE_NORMAL, context))
    gp.check_result(gp.gp_file_save(camera_file, target))
    #subprocess.call(['xdg-open', target])
    gp.check_result(gp.gp_camera_exit(camera, context))
    gp.gp_camera_wait_for_event(camera,10,context)
    return 0


#folder = sys.argv[1]
#print sys.argv[1]
uid = pwd.getpwnam("naeluh").pw_uid
gid = grp.getgrnam("naeluh").gr_gid
p = "/media/naeluh/drive/images/" #this is the path
directory = sys.argv[1] #this is the folder
fullpath = p + directory
if not os.path.exists(fullpath):
    os.makedirs(fullpath)
    os.chmod(fullpath, 0777)
    #os.chown(fullpath, uid, gid)
    #print fullpath

ser = serial.Serial("/dev/ttyUSB0", 9600) 
print(fullpath)

while True:
    sleep(2)
    arduino = len(ser.readline())
    if arduino > 0:
		capture(fullpath)
    #sleep(5)
    #print ser.readline()
