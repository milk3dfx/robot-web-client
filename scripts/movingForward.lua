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
sleep(4000)
-- set acceleration
setMotorAcceleration(Right, 10)
setMotorAcceleration(Left, 10)

-- speed cicle

setMotorSpeed(Right, 100)
setMotorSpeed(Left, 100)
sleep(4000)

-- Stop motors
setMotorAcceleration(Right, 0)
setMotorAcceleration(Left, 0)
setMotorSpeed(Right, 0)
setMotorSpeed(Left, 0)