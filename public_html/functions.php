<?php

function savePost($post)
{
    $db = mysqli_connect('localhost', 'edbmrjqb_admin', 'adm456', 'edbmrjqb_blog');
    $query = 'INSERT INTO Posts (Header, Text, Url, Topic) VALUES ("' .$post->header.'", "'.$post->text.'", "'.$post->url.'", "'.$post->topic.'")';
    
    if (mysqli_query($db, $query))
    {
        echo 'Inlägg sparat';
    }
    else
    {
        echo 'Gick inte att spara inlägget: '.mysqli_error($db);
    }
    
    mysqli_close($db);
}

function getPosts($topic)
{
    $db = mysqli_connect('localhost', 'edbmrjqb_admin', 'adm456', 'edbmrjqb_blog');
    $query = "Select * from Posts where Topic = '$topic'";
    $posts = mysqli_query($db, $query);
    
    if ($posts->num_rows > 0)
    {
        $results = array();
        
        while ($result = $posts->fetch_assoc())
        {
            array_push($results, $result);
        }
        
        return $results;
    }
    else
    {
        return null;
    }
}

function authorize($user, $password)
{
    $db = mysqli_connect('localhost', 'edbmrjqb_admin', 'adm456', 'edbmrjqb_blog');   
    $query = "SELECT * FROM Users where Username = '$user' and Password = '$password'";   
    $result = mysqli_query($db, $query);
    
    if ($result->num_rows > 0)
    {
        return true;
    }
    
    return false;
}

function getTopics(){
    $db = mysqli_connect('localhost', 'edbmrjqb_admin', 'adm456', 'edbmrjqb_blog');
    $query = "SELECT * FROM Topics";
    $results = mysqli_query($db, $query);
    
    if ($results->num_rows > 0)
    {
        $topics = array();
        
        while ($result = $results->fetch_assoc())
        {
            array_push($topics, $result);
        }
        
        return $topics;
    }
    
    return null;
}
?>