read -p "1st: " a
read -p "2nd: " b
read -p "3rd: " c

largest=$a
if (( $b > $largest )); then
largest=$b
fi

if (( $c > $largest )); then
largest=$c
fi

smallest=$a

if (( $b < $smallest  )); then 
smallest=$b
fi

if (( $c < $smallest )); then
smallest =$c
fi

echo "largest is $largest"
echo "smallest is $smallest"
