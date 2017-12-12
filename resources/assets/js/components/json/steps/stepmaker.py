from random import *

years = [2014, 2015, 2016, 2017]
months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
monthDays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]



for year in years:
	monthCount = 0
	for mDay in monthDays:
		with open(months[monthCount].lower() + str(year) + 'Steps.json', 'w') as f:
			f.write("{\n")
			f.write("\t"'"'"step-counter"'"'": {\n")
			f.write("\t\t"'"'"dataset"'"'": [\n")
			if mDay == 28 and year % 4 == 0:
				lastDay = 29
				print(year)
			else:
				lastDay = mDay
			print(months[monthCount] + ' ' + str(year) + ' Days: ' + str(lastDay))
			for day in range(1, lastDay + 1):
				randSteps = randint(234, 15000)
				f.write("\t\t\t{\n")
				f.write("\t\t\t\t"'"'"day"'"'": "'"' + str(day) + '",\n')
				f.write("\t\t\t\t"'"'"steps"'"'": " + str(randSteps) + '\n')
				f.write("\t\t\t}")
				if day == lastDay:
					f.write("\n")
				else:
					f.write(",\n")
			monthCount = monthCount + 1
			f.write("\t\t]\n")
			f.write("\t}\n")
			f.write("}\n")
f.close()