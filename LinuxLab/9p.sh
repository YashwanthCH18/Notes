#!/bin/awk -f

BEGIN{
print "the calculation of total and marks"
}

{
	cie=$1
	see=$2
	total=cie+see
	if (total>=90)
		grade="A"
	else if (total>=80)
		grade="B"
	else if (total>=70)
		grade= "C"
	else if (total>=60)
		grade="D"
	else if (total>=50)
		grade="E"
	else 
		grade="F"
	print "CIE: ",cie,"SEE: ",see,"Total: ",total,"Grade: ",grade
}
