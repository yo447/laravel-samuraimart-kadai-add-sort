<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <table>
       <tr>
           <th>ID</th>
           <th>本文</th>
       </tr>
  @foreach($posts as $post)
    <tr>
      <td>{{ $post->id }}</td>
      <td>{{ $post->content }}</td>
      <td>{{ $post->title }}</td>
    </tr>
    
  @endforeach
  </table>
</body>

</html>