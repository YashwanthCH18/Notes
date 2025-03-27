#!/bin/bash

# Check if a filename is provided as an argument
if [ "$#" -eq 0 ]; then
    echo "Usage: $0 <filename>"
    exit 1
fi

filename="$1"

# Check the file type using test operators
if [ -f "$filename" ]; then
    echo "$filename is a regular file."
elif [ -d "$filename" ]; then
    echo "$filename is a directory."
elif [ -b "$filename" ]; then
    echo "$filename is a block device."
elif [ -c "$filename" ]; then
    echo "$filename is a character device."
elif [ -L "$filename" ]; then
    echo "$filename is a symbolic link."
else
    echo "Unknown file type or file does not exist."
fi
