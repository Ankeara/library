<?php
include("./connection/conn.php");

function getTable($table)
{
    global $conn;
    $queryGet = "SELECT * FROM $table";
    return mysqli_query($conn, $queryGet);
}

function getBook($table){
    global $conn;
    $queryBook = "SELECT bk.id, bk.BookName, cat.CategoryName, aut.author_name, bk.ISBNNumber, bk.BookImg, bk.Amount, bk.status 
                FROM tblbooks bk INNER JOIN tblcategory cat ON bk.CatId = cat.id INNER JOIN tblauthors aut ON bk.AuthorId = aut.id order by id DESC limit 5;";
    return mysqli_query($conn,$queryBook);
}

function getBorrow($table){
    global $conn;
    $queryBook = "SELECT bw.borrow_id,bk.BookName,p.FullName,bw.TotalBook,
                        bw.BorrowBook,bw.ReturnBook,bw.status FROM 
                    tblborrow bw inner join tblbooks bk on bw.BookId = bk.id 
                    inner join tblperson p on bw.PersonId = p.id limit 5;";
    return mysqli_query($conn,$queryBook);
}

function getReturn($table){
    global $conn;
    $queryBook = "SELECT rt.id,p.FullName,bk.BookName,rt.amount,
    rt.returnDate,rt.status FROM 
    tblreturn rt inner join tblbooks bk on rt.book_id = bk.id 
inner join tblperson p on rt.person_id = p.id limit 5;";
    return mysqli_query($conn,$queryBook);
}

function getBookDetail($id)
{
    global $conn;
    $bookdetail = "SELECT tblbooks.*, tblcategory.CategoryName, tblauthors.author_name 
    FROM ((tblbooks
            LEFT JOIN tblcategory ON tblbooks.CatId = tblcategory.id) 
            LEFT JOIN tblauthors ON tblbooks.AuthorId = tblauthors.id) 
        WHERE tblbooks.id = $id";
    return mysqli_query($conn, $bookdetail);
}

function getBorrowDetail($id)
{
    global $conn;
    $borrowdetail = "SELECT bw.borrow_id, bk.BookName, p.FullName, bw.TotalBook, bw.BorrowBook, bw.ReturnBook, bw.status 
    FROM tblborrow bw 
    LEFT JOIN tblbooks bk ON bw.BookId = bk.id 
    LEFT JOIN tblperson p ON bw.PersonId = p.id
        WHERE bw.borrow_id = $id";
    return mysqli_query($conn, $borrowdetail);
}

function getReturnDetail($id)
{
    global $conn;
    $bookdetail = "SELECT rt.id, p.FullName, bk.BookName, rt.amount, rt.returnDate, rt.status 
    FROM tblreturn rt 
    LEFT JOIN tblbooks bk ON rt.book_id = bk.id 
    LEFT JOIN tblperson p ON rt.person_id = p.id    
        WHERE rt.id = $id";
    return mysqli_query($conn, $bookdetail);
}

function getIssueDetail($id)
{
    global $conn;
    $bookdetail = "SELECT tblbooks.*, tblcategory.CategoryName, tblauthors.author_name 
    FROM ((tblbooks
            LEFT JOIN tblcategory ON tblbooks.CatId = tblcategory.id) 
            LEFT JOIN tblauthors ON tblbooks.AuthorId = tblauthors.id) 
        WHERE tblbooks.id = $id";
    return mysqli_query($conn, $bookdetail);
}