import React from 'react';

export default function TodoItem(props){
    return (
        <div>
            {props.index + 1}. {props.todo.title}
        </div>
    )
}