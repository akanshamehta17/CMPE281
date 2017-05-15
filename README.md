# CMPE281-PERSONAL PROJECT
 Multi-Tenant, Cloud Scale, Multi-AZ SaaS App in Amazon Web Services.
 
 View the demo of this project : https://www.youtube.com/watch?v=4f7OeRLbLAc
 
 Summary :-
 
 - Created a main instance which has:
 
   (i) login.php - Grader Login page 
 
   (ii) welcome.php - welcome page to select any of the four Tenant instance.
 
 - Created Application Load Balancer to route request from main instance to any of the four Tenant instance
 
 - Each Tenant instance has following pages :

   (i) upload.php - to upload a file which is an input to Tenant's code and run it's code. 
   
   (ii) grading_page.php - stored as a frame in upload.php, viewed as grading section where grades can be entered for Tenant after viewing the image generated as output of Tenant's code. 
   
   (iii) out.php - to view the image of UML class diagram generated as output from Tenant's code.
   
   (iv) grades.php - to view grades added after running & viewing code output. The grades entered are stored in database. 
   
  - RDS instance to store Tenant's information and it's grades and depicting a multi-tenant model.
  
  - Depicted performance improvement of application using Auto Scaling for one of the tenant's instance by spinning up one more instance of that tenant if cpu utilization goes greater than 40% and removal of one instance if cpu utilization goes less than 15%.
  
  
