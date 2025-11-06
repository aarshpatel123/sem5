# check odd or even

```bash
check_odd_even() {
  read -p "Enter a number: " num
  if (( num % 2 == 0 )); then
    echo "$num is Even"
  else
    echo "$num is Odd"
  fi
}
```

# print table

```bash
num=3; for i in {1..10}; do echo "$num * $i = $((num * i))"; done
```

