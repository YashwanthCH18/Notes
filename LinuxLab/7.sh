read -p "enter first number: " a
read -p "enter second number: " b
read -p "enter the operation (+ or - or * or /) : " op 

case $op in
	+) echo " Result is $(( a+b ))" ;;
	-) echo " Result is $(( a-b ))" ;;
	\*) echo "Result is $(( a*b ))" ;;
	/) echo "Result is $(( a/b ))" ;;
	*) echo "enter a valid choice"
esac
