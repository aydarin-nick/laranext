'use client'

import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import LoginLinks from "@/app/LoginLinks";

function ListItem(props){
    return <li>{props.name}</li>
}

function CategoriesFunc(props) {
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

    const content = items.map((cat) =>
        <li key={cat.id} className="has-sub">
            <a className="sublink" href="#" style={{ display: 'inline-block', width: '150px' }}
               ><span>{cat.name}</span></a>
            <a className="link-edit" style={{ display: 'inline-block', width: '138px' }}
               href="1">Изменить</a>
            <button className="btn_del" data-id={cat.id} value={cat.id}>Удалить</button>
            <ul>
                {cat.children_categories.map((childCat) => {
                    <li key={childCat.id} className="has-sub">
                        <a className="sublink" href="#" style= {{ display: 'inline-block' , width: '150px' }}>
                            <span>{childCat.name}</span></a>
                        <a className="link-edit" style={{ display: 'inline-block', width: '138px' }}
                           href="1">Изменить</a>
                        <button className="btn_del" data-id={childCat.id} value={childCat.id} >Удалить
                        </button>
                    </li>
                })}
            </ul>
        </li>
    );

    return (
        <ul>
            {content}
        </ul>
    )

}

export default CategoriesFunc

/*const handleCheck = (id) => {
    const listItems = items.map(item => item.id === id ? {...item,
        checked: !item.checked} : item)
    setItems(listItems)
}

<ul>
            {items.map((item) => (
                <li className='item' key={item.id}>{item.name}</li>
            ))}
        </ul>

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






