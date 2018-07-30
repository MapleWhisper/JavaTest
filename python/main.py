import sys
try:
    while True:
        line = sys.stdin.readline().strip()
        if line == '':
            break
        line = str(line)
        line = '%8s'%line
        print(line)
except:
    pass