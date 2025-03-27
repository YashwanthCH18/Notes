read -p "enter the absolute path of dictionary :" dir

[ ! -d "$dir" ] && { echo "$dir is not a directory";exit 1; }

for file in "$dir"/*; do
	[ -f "$file" ] && { echo "$file properties are : "; stat "$file";echo; }
done
