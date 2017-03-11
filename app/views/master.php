<!doctype html>
<html lang="he">
  <head>
    <meta charset="UTF-8">
    <title>My Tasks</title>
    <link rel="stylesheet" href="../public/lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
  </head>
  <body dir="rtl">

    <script type="text/x-handlebars" id="tasks">
      <section class="container">
        <header class="row" id="header">
          <div class="col-xs-12">
            <h1>משימות</h1>
            <div class="circle"></div>
            <button type="button" class="btn-plus"  {{action "addTask"}}>+</button> 
          </div>
        </header>
      <div class="row" id="main">
            {{#if addTask}}
              <div class="col-xs-12 new-task-wrapper">
                  {{input type="text" id="new-task" placeholder="הזן משימה חדשה" value=taskValue action="createTask" autocomplete="off" autofocus="true"}}
              </div>
            {{/if}}
        <div class="col-xs-12 task-list">
          <ul>
            {{#each}}
                <li class="list">
                    {{#if isEditTask}}
                      {{edit-task class="edit-task" placeholder="הזן משימה חדשה" value=tempTesk action="sendEditTask" focus-out="cancelEdit" autocomplete="off" autofocus="true"}}
                     {{else}}
                       <input type="checkbox" {{bind-attr class=":task-checkbox completed:completed"}} {{action "taskCompleted" id}}>
                       <div class="input-wrapper" {{action "editTask" id}}>       
                          <label {{bind-attr class=":task completed:completed"}}>{{taskIndex}}.{{title}}</label>
                       </div> 
                       <button class="pull-left delete-btn" {{action "deleteTask" id}}>x</button>
                    {{/if}} 
                </li>
            {{/each}}  
          </ul>
        </div>
      </div>
    </section>
    <section class="container footer-container">    
      <footer class="row" id="footer">
        <div class="col-xs-12">
          <ul>
            <li>לסיום: {{unfinished}}</li>
            <li>הושלמו: {{taskCompleted}}</li>
            <li>סה"כ: {{total}}</li>
          </ul>
        </div>
        <p class="instructions">לחץ על כפתור הפלוס להוספת משימה. לעריכה לחץ על הטקסט הרצוי</p>
      </footer>
    </section>  
    </script>

    <script src="../public/lib/jquery/jquery-1.11.2.min.js"></script>
    <script src="../public/lib/ember/handlebars-v1.3.0.js"></script>
    <script src="../public/lib/ember/ember.js"></script>
    <script src="../public/lib/ember/ember-data.js"></script>
    <script src="../public/js/app.js"></script>
    <script src="../public/js/router.js"></script>
    <script src="../public/js/models/task.js"></script>
    <script src="../public/js/controllers/task.js"></script>
    <script src="../public/js/controllers/tasks.js"></script>
    <script src="../public/js/views/task-view.js"></script>
  </body>
</html>