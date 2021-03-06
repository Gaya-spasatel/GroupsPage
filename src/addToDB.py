import sqlite3
import pandas as pd

conn = sqlite3.connect("./groupPageDb.db")
cursor_sqlite = conn.cursor()
filename = "./data/Справочник подключений Общий.xlsx"
data = pd.read_excel(filename)

for row in data.values:
    print(row)
    group = row[0]
    subject = row[2]
    link = row[3]
    department = row[4]
    semester = row[1]

    sql = f"SELECT * FROM \"groups\" WHERE name = '{group}'"
    cursor_sqlite.execute(sql)
    result = cursor_sqlite.fetchone()
    if result is None:
        print("insert group")
        sql = f"INSERT INTO \"groups\"(name, is_present) VALUES ('{group}', 1)"
        cursor_sqlite.execute(sql)
        conn.commit()

    sql = f"SELECT * FROM subject_info WHERE group_name = '{group}' AND subject = '{subject}' AND link = '{link}'" \
          f" AND department = '{department}'"
    cursor_sqlite.execute(sql)
    result = cursor_sqlite.fetchone()
    if result is None:
        print("insert subject")
        sql = f"INSERT INTO subject_info(group_name, semester,subject,link,department) VALUES ('{group}', {semester}," \
          f" '{subject}', '{link}', '{department}')"
        cursor_sqlite.execute(sql)
        conn.commit()

