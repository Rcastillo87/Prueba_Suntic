import mysql.connector
from datetime import datetime
from fpdf import FPDF

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="datosdb"
)

print("Este programa recibe un archivo .txt y almacena eb BD algunos registros del archivo \n")

print("ingrese la ruta del archivo: \n")
ruta = r"C:\Users\Ruben\Desktop\Python\g.txt"
##input()
array = ruta.split("\\")
nombre = array[len(array)-1]
lines = 0
palabras = 0
letras = 0

with open(ruta, 'r') as f:
    for i in f:
        lines+=1
        palabras += len(i.split())
        letras +=len(i)


sql = "INSERT INTO informacion (codigo, nombrearchivo, cantlineas, cantpalabras, fecharegistro, cantcaracteres) VALUES (%s, %s, %s, %s, %s, %s)"
val = ("", nombre, lines, palabras, datetime.now(), letras)
cursor1=mydb.cursor()
cursor1.execute(sql, val)
mydb.commit()

print(cursor1.rowcount, "registro insertado. \n")

cursor1.execute("select * from informacion")
mydb.close()

for fila in cursor1:
    print(fila)

pdf=FPDF(format='letter', unit='in')
pdf.add_page()
pdf.set_font('Times','',10.0)
epw = pdf.w - 2*pdf.l_margin
col_width = epw/6

pdf.set_font('Times','B',14.0) 
pdf.cell(epw, 0.0, 'LISTA', align='C')
pdf.set_font('Times','',10.0) 
pdf.ln(0.5)

th = pdf.font_size
 
for row in cursor1:
    for datum in row:
        pdf.cell(col_width, th, str(datum), border=1)
    pdf.ln(th)
pdf.ln(4*th)
 
pdf.output('lista.pdf','F')
