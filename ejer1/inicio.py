print("Este programa recibe un archivo .txt y un número N, he imprime las primeras N líneas del archivo. \n")

print("Digite el numero de lineas que desea imprimir: \n")
lineas = int(input())

print("ingrese la ruta del archivo: \n")
ruta = input()

with open(ruta, 'r') as f:
    cont = 0
    for i in f:
        cont+=1
        if cont > lineas :
            break
        else:
            print(i)