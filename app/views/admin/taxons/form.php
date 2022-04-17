<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/admin/taxons/create" method="post">
        <div>
            <input
                type="text"
                name="name"
                placeholder="Name"
                required
            />
        </div>
        <div>
            <textarea
                name="description"
                id="description"
                cols="30"
                rows="10"
                placeholder="Description"
            ></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>