<h1>Test Task</h1>

<p>
    Php version: 8.1 <br>
    Laravel version: 9 <br>
    MySQL version: 8.0
</p>

<ol>
    <li>Clone this repository</li>
    <li>Run composer install</li>
    <li>Configure .env (I used redis as QUEUE_CONNECTION)</li>
    <li>Run php artisan key:generate</li>
    <li>Run php artisan migrate --seed</li>
    <li>Run php artisan serve</li>
    <li>Import this collection to your Postman: <a href="https://www.getpostman.com/collections/f4f5888d94cea0f8958f">URL</a></li>
    <li>Run queue listeners, queues: send_post_to_subscribers, send_post_to_subscribers, create_post_emails</li>
    <li>Subscribe to website</li>
    <li>Create a post after subscribing</li>
    <li>Run "php artisan post-emails:send"</li>
</ol>

<b>All points done, including optionals.</b>
