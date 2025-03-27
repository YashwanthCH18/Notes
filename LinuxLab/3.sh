read -p "enetr principal amount" p
read -p "enter interest: " r
read -p "time: " t

echo " simple interest is $(( (p*r*t)/100 )) "
