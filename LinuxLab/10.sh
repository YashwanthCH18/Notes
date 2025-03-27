read -p "enter the basic amount: " basic

if (( basic <  6000)); then
	hra=$(( (basic*50)/100 ))
	da=$(( (basic*25)/100 ))
else
	hra=$((  (basic*40)/100 ))
	da=1000
fi

gross=$(( basic+hra+da ))

echo "gross is $gross"
echo "basic is $basic"
echo "hra is $hra"
echo "da is $da"
