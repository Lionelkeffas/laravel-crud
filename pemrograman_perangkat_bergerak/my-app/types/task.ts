 // types/Task.ts
 // Interface utama untuk satu item Task
 export interface Task {
 id: string; // ID unik (menggunakan Date.now().toString())
  title: string; // Judul/nama task
 description?: string; // Deskripsi opsional
 isCompleted: boolean; // Status selesai/belum
 priority: Priority; // Prioritas task
 createdAt: Date; // Waktu dibuat
 completedAt?: Date; // Waktu selesai (opsional)
 }

 // Enum untuk prioritas
 export type Priority = 'high' | 'medium' | 'low';

 // State dari seluruh aplikasi
 export interface TaskState {
 tasks: Task[];
 filter: 'all' | 'active' | 'completed';
 }

 // Props untuk komponen TaskItem
 export interface TaskItemProps {
 task: Task;
 onToggle: (id: string) => void;
 onDelete: (id: string) => void;
 }

 // Props untuk komponen TaskInput
 export interface TaskInputProps {
 onAddTask: (title: string, priority: Priority) => void;
 }