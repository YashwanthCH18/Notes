if [ "$#" -eq 0 ]; then
	echo "enter the filename"
	exit 1
fi

filename=$1

if [ -f $filename ]; then
	echo "normal file"
elif [ -d $filename ]; then
	echo "directory"
elif [ -c $filename ]; then
	echo "character file"
elif [ -b $filename ]; then
	echo "block file"
elif [ -L $filename ]; then
	echo "symbollic link"
else
	echo "missing file type"
fi
