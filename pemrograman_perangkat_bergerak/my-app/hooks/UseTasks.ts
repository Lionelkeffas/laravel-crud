import { useState, useCallback } from 'react';
import { Task, Priority, TaskState } from '../types/task';

export const useTasks = () => {
  const [state, setState] = useState<TaskState>({
    tasks: [],
    filter: 'all',
  });

  const addTask = useCallback((title: string, priority: Priority) => {
    const newTask: Task = {
      id: Date.now().toString(),
      title: title.trim(),
      isCompleted: false,
      priority,
      createdAt: new Date(),
    };

    setState(prev => ({
      ...prev,
      tasks: [newTask, ...prev.tasks],
    }));
  }, []);

  const toggleTask = useCallback((id: string) => {
    setState(prev => ({
      ...prev,
      tasks: prev.tasks.map(task =>
        task.id === id
          ? {
              ...task,
              isCompleted: !task.isCompleted,
              completedAt: !task.isCompleted ? new Date() : undefined,
            }
          : task
      ),
    }));
  }, []);

  const deleteTask = useCallback((id: string) => {
    setState(prev => ({
      ...prev,
      tasks: prev.tasks.filter(task => task.id !== id),
    }));
  }, []);

  const setFilter = useCallback((filter: 'all' | 'active' | 'completed') => {
    setState(prev => ({ ...prev, filter }));
  }, []);

  const filteredTasks = state.tasks.filter(task => {
    if (state.filter === 'active') return !task.isCompleted;
    if (state.filter === 'completed') return task.isCompleted;
    return true;
  });

  return { state, filteredTasks, addTask, toggleTask, deleteTask, setFilter };
};
