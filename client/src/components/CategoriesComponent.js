'use client'

import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import LoginLinks from "@/app/LoginLinks";

function CategoriesFunc() {
    const [items, setItems] = useState([]);
    //const [newItems, setNewItems] = useState("");
    //const [serchItem, setSerchItem] = useState("");
    const [fetchError, setFetchError] = useState(null);

    const API_URL = "http://localhost:8000/api/categories"

    useEffect(() => {
        const fetchItems = async () => {
            try {
                const response = await fetch(API_URL)
                const listItems = await response.json()
                if(!response.ok) throw Error("Did not receive list items")
                setItems(listItems)
                setFetchError(null)
            } catch (error) {
                console.log(error)
                setFetchError(error.message)
            }
        }
        fetchItems()
    }, [])

    return (
        <ul>
            {items.map((item,key) => (
                <li className='item' key={key}>{item.name}1</li>
            ))}
        </ul>
    )

}

export default CategoriesFunc

/*const handleCheck = (id) => {
    const listItems = items.map(item => item.id === id ? {...item,
        checked: !item.checked} : item)
    setItems(listItems)
}

const handleDelete = (id) => {
    const listItems = items.filter(item => item.id !== id)
    setItems(listItems)
}

const addItem = item => {
    const id = items.length ? items[items.length - 1].id + 1 : 1;
    const myNewItem = {id, checked: false, item};
    const listItems = [...items, myNewItem];
    setItems(listItems)
}

const HeandlSubmit = e => {
    e.preventDefault();
    if(!newItems) return;
    addItem(newItems);
    console.log(newItems);
    setNewItems("");
}*/






