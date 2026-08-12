import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View, SafeAreaView } from 'react-native';
import { TaskInput } from '../components/Taskinput';
import { TaskList } from '../components/Tasklist';
import { useTasks } from '../hooks/UseTasks';

 export default function App() {
 const { filteredTasks, addTask, toggleTask, deleteTask } = useTasks();

 return (
 <SafeAreaView style={styles.safeArea}>
 <StatusBar style="light" />
 {/* Header */}
 <View style={styles.header}>
 <Text style={styles.headerTitle}>📋 Task Manager</Text>
 <Text style={styles.headerSub}>
 {filteredTasks.filter(t => !t.isCompleted).length} task tersisa
 </Text>
 </View>

 {/* Content */}
 <View style={styles.content}>
 <TaskInput onAddTask={addTask} />
 <TaskList
 tasks={filteredTasks}
 onToggle={toggleTask}
 onDelete={deleteTask}
 />
 </View>
 </SafeAreaView>
 );
 }

 const styles = StyleSheet.create({
 safeArea: { flex: 1, backgroundColor: '#06f9d1' },
 header: { paddingHorizontal: 20, paddingTop: 16, paddingBottom: 20 },
 headerTitle: { fontSize: 26, fontWeight: 'bold', color: 'FFFFFF' },
 headerSub: { fontSize: 14, color: '#22bace', marginTop: 4 },
 content: { flex: 1, backgroundColor: '#F1F5F9',
 borderTopLeftRadius: 24, borderTopRightRadius: 24, padding: 16 },
 });