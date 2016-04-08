PROBLEM NUMBER 3
This project allows 3 interviewers to interview multiple candidates, allows the interviewers to rate the candidates  between 1 to 5 and display the candidate list based on their rank.
=============================================================
TECHNOLOGIES USED: PHP,MySQL and Javascript
=============================================================
DESIGN OF DATABASE TABLES
1) A new candidate can register into a site and the details will be saved in DB table called candidate.
=> CANDIDATE_NEW TABLE  has the following attributes  - candidate id, name, user name , password, position for apply, gender and total marks which is  defaultly setted as value 0(candidate id is a primary key).
2) INTERVIEWER TABLE table has the interviewer id, interviewer name, username, password  as a attribute(interviewer id is a primary key).
Here 1 interviewer can interview many candidates and 1 candidate is interviewed by 3 interviewer( M:N replationship). we need to form a separate table in which the candidate id and interviewer id are set as a composite primary key.
3)Because of M:N relationship  we need to form a separate table called candidate_interview in which the candidate id and interviewer id are set as a composite primary key.
=>CANDIDATE_INTERVIEW_NEW TABLE which has candidate id, interviewer id and mark as a attributes(interviewer id and candidate id are set as composite primary key and candidate_id is a foreign key which references the primary key of the CANDIDATE table and interviewer_id is also a foreign key which references the primary key of the INTERVIEWER table).
=============================================================================
DESIGN CONSTRAINS 
=> Once the mark is updated by a interviewer to a particular candidate then the mark  need to be updated in MARK attribute in candidate table.
=> TRIGGER is designed to update the  mark to CANDIDATE_NEW TABLE , AFTER INSERT ON CANDIDATE_INTERVIEW_NEW.
=>  To avoid duplication and multiple submission on mark the interviewer_id and the candidate_id should be designed as composite primary key of CANDIDATE_INTERVIEW_NEW TABLE). UNIQUE KEY CONSTRAIN will helps to avoids the duplicates and it ensures the single submission.
==============================================================================
IMPLEMENTATION DESCRIPTION:
index.php - It's a home page and has links for interviewer to login and candidates to register.
interviewer_login.php -The design of login page for interviewer
interviewer_login_validation.php - To check whether the login details matches with already saved credentials in database.
logout.php - To distroy the session.
mark_update.php - It allows the interviewer to view the candidate details( retrival of candidates data from database). It provides a place to award marks to a particular candidate.
calculate.php - In this code the mark awarded by the interviewer to a particular candidate is inserted into CANDIDATE_INTERVIEW_NEW table and TRIGGER is created to update the portion of the mark into CANDIDATE table, which is taken the trigger time as AFTER INSERT ON CANDIDATE_INTERVIEW_NEW.
candidate_registration.php - To allow a new candidate to provide their details ( design page of candidate registration).
candidate_save.php - To save the newly entered candidate details into CANDIDATE _NEW table.
individual_rating_view.php - To allow the individual interviewers to view their  previously given ratings .
individual_result.php - To display a rank of a particular candidate.
result.php - To display the candidate details based on  the rank.
=============================================================================
TEST PLAN
FEATURE TO BE TESTED
1. Authendicate the interviewer with his credentials saved in database when he tries to login.
INPUT: USERNAME AND PASSWORD
OUTPUT: SUCCESSFULLY LOGGED IN OR PROMPT AN ALERT TO ENTER VALID CREDENTIALS.
2. Check whether the MARK is in range of 1 to 5 before update it into database.
INPUT: VALUE
OUTPUT: PROMPT AN ALERT IF THE FIELD IS ENTERED WITH IRRELAVENT DATA( NEGATIVE VALUES, EXCEEDS THE RANGE 1-5, ALPHABETICS VALUES AND SPECIAL CHARACTERS).
============================================================================
PROJECT METRICS
This project allows the interviewers to award marks to many candidates and also view the candidate details and their rank.