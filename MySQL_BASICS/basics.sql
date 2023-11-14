SELECT * FROM students
JOIN school
ON students.school=school.idschool;

SELECT prenom FROM students;

SELECT students.prenom, students.datenaissance, students.school
FROM students
JOIN school
ON students.school=school.idschool;

SELECT * FROM students
WHERE genre= 'F';

SELECT
students.*,
    school.school AS campus
FROM
    students
INNER JOIN school ON students.school = school.idschool
WHERE 
students.school = (
SELECT school
FROM students
WHERE nom = "Addy");

SELECT prenom
FROM students
ORDER BY prenom DESC;

INSERT INTO students (nom, prenom, datenaissance, genre, school)
VALUES ('Dalor', 'Ginette', '1930-01-01', 'F', 1);

UPDATE students SET prenom = 'Omer', genre = 'M' WHERE nom = 'Dalor';

DELETE FROM students WHERE idStudent = 3;

UPDATE school SET school = 'Liege' WHERE idschool = 1;
UPDATE school SET school = 'Gent' WHERE idschool = 2;