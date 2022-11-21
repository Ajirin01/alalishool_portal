import React from 'react';
import TodoItem from '@/Components/TodoApp/TodoItem';

export default function TodoList() {
    const todos = [
        {'title': 'go to school'},
        {'title': 'wash plate'},
        {'title': 'sleep after work'},
        {'title': 'fuck my friend'},
        {'title': 'Branch to gym'}
    ];

    return (
        <div>
            <h2>Todos</h2>
            <ul >
                {todos.map((todo, index)=>{
                    return (
                        <li key={index}>
                            <TodoItem todo={todo} index={index} />
                        </li>
                    )
                })}
            </ul>
        </div>
    );
}
