import sqlite3

conn = sqlite3.connect("./groupPageDb.db")
cursor_sqlite = conn.cursor()

sql = '''
CREATE TABLE groups(
name TEXT PRIMARY KEY NOT NULL,
is_present NUMERIC(1) NOT NULL
);
'''

sql2 = '''
CREATE TABLE subject_info(
group_name TEXT,
semester NUMERIC(1) NOT NULL,
subject TEXT NIT NULL,
link TEXT NOT NULL,
department TEXT NOT NULL,
FOREIGN KEY (group_name) REFERENCES "groups" (name)
);
'''

cursor_sqlite.execute(sql)
cursor_sqlite.execute(sql2)
conn.commit()
