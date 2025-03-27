read -p "enter the absolute dictionary path" dir
[ ! -d "$dir" ] && { echo "$dir is not a directory"; exit 1;}

for file in "$dir"/*; do
	[ -f "$file" ] &&  { echo "properties of $file"; stat "$file"; echo;}
done
