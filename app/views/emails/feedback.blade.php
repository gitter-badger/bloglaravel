    <!DOCTYPE html>
    <html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Добро пожаловать на нас сайт</h2>
        <div>
            Здравствуйте {{ $firstname }}
        </div>
        <div>
            Ваша цель вопроса состояла в - " {{ $goal }} "
        </div>
        <div>
            Вопрос -  <p>{{ $question }} </p>
                      <p>{{ $date }}</p>
        </div>
        <div>
            Ответ на Ваш вопрос:
            <p>{{ $text_response }}</p>
        </div>
        <div>
            С уважением - {{ $adminName }}
            Email  -  {{ $adminEmail }}
        </div>
    </body>
    </html>




