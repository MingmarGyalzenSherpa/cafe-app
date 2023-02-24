@extends('frontend.adminPanel.layouts.main');
@section('container')
    <div class="container" style="margin-top:90px;">
        <h1>Items</h1>
        <form action="{{}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Item Name:</label>
                <input type="text" name="name" >
                <br>
                <br>
            <label for="category">Category</label>
            <select name="category" id="">
                <option value="hi">food</option>
                <option value="hi">foods</option>
                <option value="hi">fooed</option>
            </select>
            <br>
            <br>
            <label for="image">Image:</label>
            <input type="file" name="img">
            <br>
            <br>
            <label for="price">price:</label>
            <input type="text" name="price">
            <br>
            <button type="submit">Add Item</button>
        </form>    
        
        
    </div>
@endsection