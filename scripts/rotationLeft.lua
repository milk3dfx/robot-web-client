--[[
------------------------------------------------
	Functions
 sleep(time)
 setMotorAcceleration(motor, accel)
 setMotorSpeed(motor, speed)
------------------------------------------------
]]

Right = 0 -- Right motor
Left = 1 -- Left motor

-- set acceleration
setMotorAcceleration(Right, 50)
setMotorAcceleration(Left, 50)

-- speed cicle

setMotorSpeed(Right, 80)
setMotorSpeed(Left, 30)
sleep(3000)

-- Stop motors
setMotorAcceleration(Right, 0)
setMotorAcceleration(Left, 0)
setMotorSpeed(Right, 0)
setMotorSpeed(Left, 0)