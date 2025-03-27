#!/bin/bash

# Taking input from the user
read -p "Enter first number: " a
read -p "Enter second number: " b
read -p "Enter third number: " c

# Finding the largest number
largest=$a
if (( b > largest )); then
    largest=$b
fi
if (( c > largest )); then
    largest=$c
fi

# Finding the smallest number
smallest=$a
if (( b < smallest )); then
    smallest=$b
fi
if (( c < smallest )); then
    smallest=$c
fi

# Display results
echo "Largest number: $largest"
echo "Smallest number: $smallest"
