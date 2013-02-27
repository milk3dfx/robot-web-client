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

setMotorSpeed(Right, 100)
setMotorSpeed(Left, 100)
sleep(3000)

setMotorSpeed(Right, -100)
setMotorSpeed(Left, -100)
sleep(3000)


-- Stop motors
 setMotorSpeed(Right, 0)
 setMotorSpeed(Left, 0)
 setMotorAcceleration(Right, 0)
 setMotorAcceleration(Left, 0)


--[[
-------------------------------------------------
maxVal = 100;
for i = 0, maxVal, 5 do
	sleep(1000)
	print(math.pow(i,2))
end
]]